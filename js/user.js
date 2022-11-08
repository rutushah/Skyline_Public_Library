/**
 * Validation To check the user Role Selection On Select Role.php
 * 
 * Description : If user Role is not selected either admin, staff or user, user should get validation message to select role
 * */ 
 function selectRole(){
    var select_role  = document.selectRole_form.role;
    for(i=0; i<select_role.length; i++){
        if(select_role[i].checked == true)
            return true;
    }
    document.getElementById("err_msg").innerHTML = '<p style = "color:red">Please select the Role!!</p>';
    return false;
}


/**
 * 
 * Redirect to login page
 * 
 */

 function redirectToLoginPage(){
    window.location.href = 'user_login.php?role=user';
}




  