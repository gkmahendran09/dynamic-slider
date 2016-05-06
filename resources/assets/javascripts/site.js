//get loader
function getAjaxLoader(message) {
  return '<i class="fa fa-spinner fa-spin"></i> ' + message;
}
//Make Ajax Request
//triggerAjaxRequest(type, url, data, onSuccess(), onError())
function triggerAjaxRequest(type, url, data, onSuccess, onError) {
  $.ajax({
  	type: type,
  	url: url,
  	data: data,
  	dataType: "json",
  	success: function(data) {
      onSuccess(data);
  	},
  	error: function(data) {
      onError(data);
  	}
  });
}

//Default Ajax Error handler
function defaultAjaxErrorHandler(data) {
  if(data.responseJSON) {
    showErrorsForFormRequest(data.responseJSON);
  } else {
    // showModal("Error", "Please try reloading the page.");
    showModal("Error", data.responseText);
  }
}

//Dynamic Form On Success
function dynamicFormOnSuccess(data) {
  clearErrorsForFormRequest();
  // var url = data.previewURL;
  // var modalData = '<div class="alert alert-success">' + data.message + '</div>';
  // modalData += '<div class="row">';
  // modalData += '<div class="col-md-12 text-center">';
  // modalData += '<a href="' + url + '" class="btn btn-primary" id="preview_form_btn">Preview Form</a>';
  // modalData += '</div>';
  showModal("Success", data.message);
}

//Show Modal
function showModal(title, data) {
  $("#modal .modal-title").html(title);
  $("#modal .modal-body").html(data);
  $("#modal").modal();
}

//Show Errors
function showErrors(data) {
  var response = JSON.parse(data);

  $.each(response.errors, function(key, value) {
    $("[data-error-msg-for='"+ key +"']").html(value);
  });

}

//Show Errors
function showErrorsForFormRequest(data) {
  clearErrorsForFormRequest();

  var response = data;
  $.each(response, function(key, value) {
    $("[data-error-msg-for='"+ key +"']").html(value);
  });

}

//Clear Errors
function clearErrorsForFormRequest() {

  $("[data-error-msg-for]").html('');

}


$(document).ready(function() {
  //Ajax Setup
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
     timeout: 100000 //Time in milliseconds
  });

  //Tooltip
  $('[data-toggle="tooltip"]').tooltip();
});
