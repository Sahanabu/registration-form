$(document).ready(function(){
  $("#courseForm").on("submit", function(){
    const phone = $("input[name='student_phone']").val();
    if(!/^\d{10}$/.test(phone)){
      alert("Please enter a valid 10-digit phone number.");
      return false;
    }
  });
});
