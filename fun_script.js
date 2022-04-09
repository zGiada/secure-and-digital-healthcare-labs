var data = [
    {
        "first_name": "John",
        "last_name": "Smith",
        "email": "john.smith@gmail.com",
        "pwd": "694915094",
        "job": "CEO",
        "agree": true
    },
    {
        "first_name": "Marie",
        "last_name": "Curie",
        "email": "marie.curie@gmail.com",
        "pwd": "505523580",
        "job": "Researcher",
        "agree": true
    },
    {
        "first_name": "Jeff",
        "last_name": "Bezos",
        "email": "jff.bzs@gmail.com",
        "pwd": "920194454",
        "job": "IT consultant",
        "agree": false
    }
];

populateTable();

function populateTable() {
    var out = "<table><tr>"
        + "<th>First Name</th><th>Last Name</th>"
        + "<th>Email</th><th>Hashed Pwd</th>"
        + "<th>Job</th><th>Agree</th></tr>";
    var i;
    for (i = 0; i < data.length; i++) {
        out += '<tr><td>' + data[i].first_name + '</td><td>' + data[i].last_name + '</td><td>'
            + data[i].email + '</td><td>' + data[i].pwd + '</td><td>'
            + data[i].job + '</td><td>' + data[i].agree + '</td></tr>';
    }
    document.getElementById("showData").innerHTML = out;
};

function collectData(){
    if (!checkValue()){
        var jsonObject = {
            "first_name": document.getElementById("fname").value, 
            "last_name": document.getElementById("lname").value,
            "email": document.getElementById("email").value,
            "pwd": pwdHash(document.getElementById("pwd").value),
            "job": document.getElementById("job").value,
            "agree": document.getElementById("agree_terms").checked
        };
        data.push(jsonObject);
        populateTable();
        cleanForm();
    }
    else
        alert("Fill all the form");
}

function pwdHash(string) {
    var hash = 0;
    if (string.length == 0)
        return hash;
    for (let i = 0; i < string.length; i++) {
        var charCode = string.charCodeAt(i);
        hash = ((hash << 7) - hash) + charCode;
        hash = hash & hash;
    }
    return hash;
}

//check required element
function checkValue() {
    if(
        document.getElementById("fname").value == "" ||
        document.getElementById("lname").value == "" ||
        document.getElementById("email").value == "" ||
        document.getElementById("pwd").value == "" ||
        document.getElementById("job").value == ""
    )
        return true
    else
        return false
}

function cleanForm(){
    document.getElementById("fname").value = "";
    document.getElementById("lname").value = "";
    document.getElementById("email").value = "";
    document.getElementById("pwd").value = "";
    document.getElementById("job").value = "";
}