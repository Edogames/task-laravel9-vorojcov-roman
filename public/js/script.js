toggleEditFor();

function toggleEditFor(event=null, id=null){
    if(id != null){
        if(event != null){
            event.preventDefault();
        }
        var normal = document.getElementById(`normal-view-${id}`);
        var edit = document.getElementById(`edit-view-${id}`);
        if (normal.style.display != "none") {
            normal.style.display = "none";
            edit.style.display = "block";
        }else{
            var x = confirm("Are you sure you want to cancel?");
            if(x == true){
                normal.style.display = "block";
                edit.style.display = "none";
            }
        }
    }else{
        var views = document.querySelectorAll(`[id^="normal-view-"]`);
        var edits = document.querySelectorAll(`[id^="edit-view-"]`);
        edits.forEach(i => {
            i.style.display = "none";
        });
        views.forEach(i => {
            i.style.display = "block";
        });
    }
}
