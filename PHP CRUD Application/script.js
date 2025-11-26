$(document).ready(function()

{
//============== TO Hide and Show Add Form ==========================================
$("#addbtn").click(function()

{
   $(".add").fadeToggle(800);
});

//================================= Open Update Popup + fill details==========================
    $('.editBtn').click(function() {
        $('#uid').val($(this).data('id'));
        $('#uname').val($(this).data('name'));
        $('#ucourse').val($(this).data('course'));
        $('#uemail').val($(this).data('email'));
        $('#updateModal').fadeIn();
    });

    //================================ Close popup==============================================
    $('#closeModal').click(function() {
        $('#updateModal').fadeOut();
    });


});



