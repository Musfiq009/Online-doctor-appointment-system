 document.addEventListener("DOMContentLoaded", function() {
        var firstTab = document.querySelector(".tab-btn.active");
        if(firstTab){
            var status = firstTab.textContent.trim();
            loadAppointments(status, firstTab); 
        }
    });