function getJSONFile(file, callback) {
    var rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("application/json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function () {
        if (rawFile.readyState === 4 && rawFile.status == "200") {
            callback(rawFile.responseText);
        }
    }
    rawFile.send(null);
}



getJSONFile("https://alexgr.ro/ehealth/patients.json", function (text) {
    var data = JSON.parse(text);
    var out="";
    var i;
    for (i = 0; i < data.length; i++) {
        out += '<button class="accordion">' + data[i].id + '. ' + data[i].first_name + ' ' + data[i].last_name + '</button>'
            + '<div class="panel"><h4>User Details</h4><table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Email</th></tr>'
            + '<tr><td>' + data[i].id + '</td><td>' + data[i].first_name + '</td><td>' + data[i].last_name + '</td><td>' + data[i].gender + '</td><td>' + data[i].email + '</td></tr></table>'
            + '<h4>Diagnosis Details</h4><table><tr><th>Code</th><th>Description</th><th>Detailed</th><th>Administered Drug Treatment</th></tr>'
            + '<tr><td>' + data[i].diagnosis_code + '</td><td>' + data[i].diagnosis_description + '</td><td>' + data[i].diagnosis_description_detailed + '</td><td>' + data[i].administered_drug_treatment + '</td></tr></table>'
            + '</div>';
    }
    document.getElementById("showData").innerHTML = out;
    var acc = document.getElementsByClassName("accordion");
    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
});