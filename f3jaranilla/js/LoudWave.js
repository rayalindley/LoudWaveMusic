function showPass() {
    var pass = document.getElementById("pw");
    if (pass.type === "password") {
        pass.type = "text";
    } else {
        pass.type = "password";
    }
}


function showProfile() {
    document.getElementById('myprofile').style.display = 'block';
    document.getElementById('otherorganizers').style.display = 'none';
    document.getElementById('concerts').style.display = 'none';
}

function showOtherOrganizers() {
    document.getElementById('myprofile').style.display = 'none';
    document.getElementById('otherorganizers').style.display = 'block';
    document.getElementById('concerts').style.display = 'none';
}

function showConcerts() {
    document.getElementById('myprofile').style.display = 'none';
    document.getElementById('otherorganizers').style.display = 'none';
    document.getElementById('concerts').style.display = 'block';
}

// function showProfile() {
//     hideAllDivs();
//     $('#profileDiv').show();
//     // Make an AJAX request to fetch profile content
// }

// function showOtherOrganizers() {
//     hideAllDivs();
//     $('#otherOrganizersDiv').show();
//     // Make an AJAX request to fetch other organizers content
// }

// function showConcerts() {
//     hideAllDivs();
//     $('#concertsDiv').show();
//     // Make an AJAX request to fetch concerts content
// }

// function hideAllDivs() {
//     $('#profileDiv').hide();
//     $('#otherOrganizersDiv').hide();
//     $('#concertsDiv').hide();
// }


