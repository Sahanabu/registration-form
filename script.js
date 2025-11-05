$(document).ready(function(){
  $("#courseForm").on("submit", function(){
    const phone = $("input[name='student_phone']").val();
    if(!/^\d{10}$/.test(phone)){
      alert("Please enter a valid 10-digit phone number.");
      return false;
    }

    const url = $("input[name='url']").val();
    if(url && !/^https?:\/\/.+\..+/.test(url)){
      alert("Please enter a valid URL starting with http:// or https://.");
      return false;
    }
  });

  // Live update color preview
  $('#favorite_color').on('input', function() {
    $('#color_preview').css('background-color', $(this).val());
  });

  // Initialize with default color
  $('#color_preview').css('background-color', $('#favorite_color').val());

  // Restrict phone input to numbers only
  $("input[name='student_phone']").on("input", function(){
    this.value = this.value.replace(/\D/g, '');
  });
});
