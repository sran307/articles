$(document).ready(function () {
   $(document).on("change", "#select-tag", function () {
        if($(this).val()[0]==0)
        {
            $("#add-tag").modal("show");
            var id=parseInt($(this).val()[1]);
            $("#tag-id").val(id);
        }
        else if($(this).val()[0]==1)
        {
            var id=parseInt($(this).val()[1]);
            $("#edit-tag").modal("show");
            
        }else{
            $("#delete-tag").modal("show");

        }
   });
});