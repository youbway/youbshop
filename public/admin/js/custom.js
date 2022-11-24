$(document).ready(function() {
    //data table
    $('#data-table').DataTable();


    // check admin password is correct
    $("#currentPassword").keyup(function() {
        var currentPassword = $("#currentPassword").val();
        // alert(currentPassword);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url:'/admin/check-admin-password',
            data:{currentPassword:currentPassword},
            success:function(resp){
                // alert(resp);
                if (resp === "true") {
                    $("#password-check").html("<font color = green> The current password is Correct!! </font>")
                } else {
                    $("#password-check").html("<font color = red> The current password is Incorrect!! </font>")
                }

            },
            error:function(){
                alert('Error');
            }
        })
    });

    //update status
    $(document).on("click", ".updateItemStatus", function(){
        var status = $(this).children("label").attr("status");
        var itemId = $(this).attr("item-id");
        var direction = $(this).attr("direction");
        console.log(direction);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"post",
            url:'/admin/update-'+ direction + '-status',
            data:{status:status, item_id: itemId},
            success:function(resp){
                if (resp.status === 0) {
                    $("#item-"+resp.item_id).html("<label class='badge badge-danger' status='inactive'>Inactive</label>")
                } else {
                    $("#item-"+resp.item_id).html("<label class='badge badge-success' status='active'>Active</label>")
                }
            },
            error:function(){
                alert("Error");
            }
        })
    })

    //confirm delete
    $('.confirm-delete').click(function () {
        var title = $(this).attr('title');
        var id = $(this).attr('id');
        console.log(id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:"DELETE",
                    url:`/admin/${title}/${id}`,
                    data:{id:id},
                    success:function(resp){
                        location.reload()
                    },
                    error:function(res){
                        console.log(res);
                        alert('probleme')
                    }
                })
            }
          })
    })


    //confirm delete attribute
    $('.confirm-delete-attribute').click(function () {
        var title = $(this).attr('title'); //product
        var attribute = $(this).attr('attribute'); // image
        var id = $(this).attr('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Image has been deleted.',
                'success'
                )
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:"PUT",
                    url:`/admin/${title}/delete/${id}-${attribute}`,
                    data:{id:id},
                    success:function(resp){
                        console.log(resp);
                    },
                    error:function(res){
                        console.log(res);
                        alert('probleme')
                    }
                })
            }
          })
    })

})
