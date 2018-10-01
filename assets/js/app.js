function isEmptyInput(elem, message) {
  return validateIsEmpty(elem, validateInput);
}

function isEmptySelect(elem, message) {
  return validateIsEmpty(elem, validateSelect);
}

function isNotChecked(elem, message) {
  return validateIsEmpty(elem, validateCheckbox);
}

function validateCheckbox(checkbox, message = null) {
  message = message === null ? 'You must agree.' : message;

  if( checkbox.is(':checked') ) {
    valid = true;
  } else {
    valid = false;
  }

  return {
    'valid':   valid,
    'message': message
  };
}

function validateSelect(select, message = null) {
  var selected = select.find(':selected'),
  selectName = select.attr('name').replace(/_/g, ' ');
  message = message === null ? 'The ' + selectName + ' can not be empty!' : message,
  valid;

  if(selected.length > 0) {
    valid = true;
  } else {
    valid = false;
  }

  return {
    'valid':   valid,
    'message': message
  };
}

function validateInput(input, message) {
  var inputName = input.attr('name').replace(/_/g, ' ');
  message = message === null ? 'The ' + inputName + ' is required.' : message;
  // If input is not empty string
  if( input.val() ) {
    valid = true;
  } else {
    valid = false;
  }

  return {
    'valid':   valid,
    'message': message
  };
}

function validateIsEmpty(elem, validate, message = null) {
  var isEmpty = false;

  if(Array.isArray(elem)) {
    elem.forEach(function(value, index) {
      if(typeof value === 'string') {
        return;
      }

      // If next element in array
      // is string, then this string
      // is message for current element
      var next = index+1,
      message = (typeof elem[next] === 'string') ? elem[next] : null,
      temproraryIsEmpty = validateIsEmpty(value, validate, message);

      // Check if it's not already false
      // then assign next validation result.
      if(!isEmpty) {
        isEmpty = temproraryIsEmpty;
      }
    });
  } else {
    validation = validate(elem, message);

    isEmpty = !validation.valid;

    if(!message) {
      var message = validation.message;
    }

    if(isEmpty) {
      showErrorMessage(elem, message);
    } else {
      removeErrorMessage(elem);
    }
  }

  return isEmpty;
}

function showErrorMessage(elem, message) {
  var sibling = elem.prev();
  if(!sibling || sibling.attr('class') !== 'invalid-feedback') {
    elem.before('<div class="invalid-feedback" style="display:block; margin-bottom: 8px;">'+message+'</small>');
  }
}

function removeErrorMessage(elem) {
  elem.parent().find('.invalid-feedback').remove();
}