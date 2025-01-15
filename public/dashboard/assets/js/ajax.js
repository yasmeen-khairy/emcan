$(document).ready(function() {
    let table = $('#myTable').DataTable();
    $('.dataTables_filter input').hide();
    $('.dataTables_length').hide();
});


function deleteCourse(id) {
    $.ajax({
        url: "/course/deleteCourse/" + id,
        type: 'DELETE',

       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
        },

        success: function (response) {
            $("#tr" + id).remove();
            alert('Are you sure you want ddo delete this course ?');
          
        },
        error: function (xhr, status, error) {
            alert("Error deleting course: " + error);
        }
    });
}

function unassign(id) {
    if (confirm('Are you sure you want to unassign this course?')) {
        $.ajax({
            url: "/course/unassign/" + id,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                // Remove the course row from the table
                $("#tr" + id).remove();
                alert('Course unassigned successfully!');
            },
            error: function (xhr, status, error) {
                alert("Error unassigning course: " + error);
            }
        });
    }
}



document.addEventListener("DOMContentLoaded", function() {
    const alert = document.querySelector('.alert');
    if (alert) {
        setTimeout(() => {
            alert.style.transition = "opacity 0.5s ease";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500); 
        }, 3000); 
    }
});