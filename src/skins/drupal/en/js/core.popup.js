/* vim: set ts=2 sw=2 sts=2 et: */

/**
 * Popup controller
 *  
 * @author    Creative Development LLC <info@cdev.ru> 
 * @copyright Copyright (c) 2010 Creative Development LLC <info@cdev.ru>. All rights reserved
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   SVN: $Id$
 * @link      http://www.litecommerce.com/
 * @since     3.0.0
 */

var popup = {};

/**
 * Properties
 */

// Loading status
popup.isLoading = false;

// Request type status - POST or GET
popup.isPostRequest = false;

/**
 * Methods 
 */

// Load data to popup
popup.load = function(url)
{
  var result = false;
  if (core.isRequesterEnabled) {
    var method = null;
    if (url.constructor == String) {
      method = 'loadByURL';

    } else if (url.constructor == HTMLFormElement) {
      method = 'loadByForm';
    }

    if (method) {
      this.isLoading = true;
      this.openAsWait();
      this.isPostRequest = false;
      result = this[method](url);
    }
  }

  return result;
}

// Load by URL
popup.loadByURL = function(url)
{
  return core.get(url, this.postprocessRequestCallback);
}

// Load by form element
popup.loadByForm = function(form)
{
  form = $(form).eq(0);

  if ('POST' == form.attr('method').toUpperCase()) {
    this.isPostRequest = true;
    var result = core.post(form.attr('action'), form.serialize(), this.postprocessRequestCallback);

  } else {
    var result = core.get(form.attr('action'), this.postprocessRequestCallback, form.serialize());
  }

  return result;
}

// Postprocess request
popup.postprocessRequest = function(XMLHttpRequest, textStatus, data, isValid)
{
  if (278 == XMLHttpRequest.status) {

    // Redirect
    this.close();
    var url = XMLHttpRequest.getResponseHeader('Location');
    if (url) {
      self.location = url;

    } else {
      self.location.reload(true);
    }

  } else if (279 == XMLHttpRequest.status) {

    // Internal redirect
    var url = XMLHttpRequest.getResponseHeader('Location');
    if (url) {
      this.load(url);

    } else {
      self.location.reload(true);
    }

  } else if (200 == XMLHttpRequest.status && this.isPostRequest) {

    // POST request is success - close popup in silence
    this.close();

  } else if (200 == XMLHttpRequest.status) {

    // Load new content
    this.place(data);

  } else {

    // Loading failed
    this.close();

  }
}

popup.postprocessRequestCallback = function(XMLHttpRequest, textStatus, data, isValid)
{
  return popup.postprocessRequest(XMLHttpRequest, textStatus, data, isValid);
}

// Place request data
popup.place = function(data)
{
  this.isLoading = false;

  if (false !== data) {
    data = this.extractRequestData(data);
    this.open(data);
    this.postprocess();
  }
}

// Extract widget data
popup.extractRequestData = function(data)
{
  return data;
}

// Popup post processing 
popup.postprocess = function()
{
  $('.blockMsg h1.title').remove();

  var o = this;
  $('.blockMsg form').submit(
    function(event) {
      event.stopPropagation();
      o.freezePopup();
      o.load(this);
      return false;
    }
  );
}

// Freeze popup content
popup.freezePopup = function()
{
  $('.blockMsg form').each(
    function() {
      $('button,input:image,input:submit', this).each(
        function() {
          if (!this.disabled) {
            this.temporaryDisabled = true;
            this.disabled = true;
        }
        }
      );
    }
  );
}

// Unfreeze popup content
popup.unfreezePopup = function()
{
  $('.blockMsg form').each(
    function() {
      $('button,input:image,input:submit', this).each(
        function() {
          if (this.temporaryDisabled) {
            this.disabled = false;
            this.temporaryDisabled = true;
          }
        }
      );
    }
  );
}

// Open as wait box
popup.openAsWait = function()
{
  this.open('<div class="block-wait">Please wait ...</div>');
}

// Open-n-display popup
popup.open = function(box)
{
  if (box && box.contructor == Object && 'undefined' != typeof(box.html)) {
    box = box.html();
  }

  $.blockUI(
    {
      message: '<a href="#" class="close-link"></a><div class="block-container"><div class="block-subcontainer">' + box + '</div></div>'
    }
  );

  // Reposition
  $('.blockMsg')
    .css('left', Math.round(($(window).width() - $('.blockMsg').width()) / 2) + 'px')
    .css('z-index', '1200000');

  // Add close handler
  var o = this;
  $('.blockMsg a.close-link').click(
    function(event) {
      o.close();
      return false;
    }
  );

  // Modify overlay
  $('.blockOverlay')
    .attr('title', 'Click to unblock')
    .css('z-index', '1100000')
    .click(
      function(event) {
        return o.close();
      }
    );
}

// Close popup
popup.close = function()
{
  $.unblockUI();
}