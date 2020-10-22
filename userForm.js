function addValueToPassword(button)
{
    var currVal = $("passcode").val();
    if(button == "bksp")
    {
        $("passcode").val(currVal.substring(0,currVal.length-1));
    }
    else{
        $("passcode").val(currVal.concat(button));
    }
}

$("btnEnter").click(function()
{
    var password = getPassword();
    if(document.getElementById("passcode").value == password)
    {
            $("btnEnter").attr(href="pagemenu.html").button();
    }
else {
    alert("Incorrect password, please try again.");
}
});

function getPassword()
{
    if (typeof(Storage) == "undefined")
    {
        alert("Your browser does not support HTML5 Local Storage. Try upgrading.");
    }
    else if(localStorage.getItem("user") != null)
    {
        return JSON.parse(localStroage.getItem("user")).NewPassword;
    }
    else{
        return "1234";
    }
}

$("frmUserForm").submit(function(){//Event : Submitting the form}
saveUserForm();
return true;
});

function checkUserForm()
{
    var d = new Date();
    var month = d.getMonth()+1;
    var date = d.getDate();
    var year = d.getFullYear();
    var currentDate = year + '/' +((''+month).length<2 ? '0' : '')+
     month + '/' + ((''+date).length<2 ? '0' : '') + date;

     if(($("txtFirstName").val() != "")&&
     ($("txtLastName").val() != "")&&
     ($("datBirthddate").val() != "")&& ($("#datBirthdate").val() <= currentDate)&&
     ($("txtChangePassword").val() != "")&&
     ($("intPhoneNumber").val() != "")&&
     ($("slcGender option: selected").val() != "Select Gender") )
     {
         return true;
        }
     else
     {
         return false;
    }
}

function saveUserForm()
{if (checkUserForm())
    {
        var user = {
            "FirstName" : $("txtFirstName").val(),
            "LastName" : $("txtLastName").val(),
            "Birthdate" : $("datBirthdate").val(),
            "NewPassword" : $("txtChangePassword").val(),
            "PhoneNumber" : $("intPhoneNumber").val(),
            "Gender" : $("slcGender").val(),
        };
        try 
        {
            localStorage.setItem("user", JSON.stringify(user));
            alert("Saving Infofmation")
            $.mobile.changePage("menupage.html");
        }
        catch(e)
        {
            if (window.navigator.vendor ==="Google Inc")
            {
                if (e == DOMException.QUOTA_EXCEEDED_ERR)
                    {
                        alert("Error: Local Storage Limit Exceeded")
                    }
            }
else if (e == QUOTA_EXCEEDED_ERR){
    alert("Error: Saving to local Storage");
}
console.log(e);
        }
    }
else {
    alert("Please complete the from properly");
}

}

function showUserForm()
{
    try
    {
        var user = JSON.parse(localStorage.getItem("user"));
    }
    catch(e)
    {
        if (window.navigator.vendor ==="Google Inc")
        {
            if (e == DOMException.QUOTA_EXCEEDED_ERR)
                {
                    alert("Error: Local Storage Limit Exceeded")
                }
        }
else if (e == QUOTA_EXCEEDED_ERR){
alert("Error: Saving to local Storage");
}
console.log(e);
    }

    if (user != null)
    {
        $("txtFirstName").val(user.FirstName);
        $("txtLastName").val(user.LastName);
        $("datBirthdate").val(user.Birthdate);
        $("txtChangePassword").val(user.NewPassword);
        $("intPhoneNumber").val(user.PhoneNumber);
        $('slcGender option[value='+user.Gender+']').attr('selected','selected');
    }

}

$(document).on("pageshow", function(){
    if($('.ui-page-active').attr('id')=="pageUserInfo")
    {
        showUserForm();
    }
    });