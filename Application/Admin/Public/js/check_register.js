function checkreg()
{
    if (form1.name.value=="")
    {
        // 如果真实姓名为空，则显示警告信息
        alert("真实姓名不能为空！");
        form1.name.focus();
        return false;
    }
    if (form1.password.value=="" )
    {
        // 如果密码为空，则显示警告信息
        alert("密码不能为空！");
        form1.password.focus();
        return false;
    }
    if (form1.pwd.value=="" )
    {
        // 如果密码为空，则显示警告信息
        alert("确认密码不能为空！");
        form1.pwd.focus();
        return false;
    }
    // 两次密码应一样
    if (form1.password.value!=form1.pwd.value && form1.password.value!="")
    {
        alert("两次密码不一样，请确认！");
        form1.password.focus();
        return false;
    }
    if (form1.email.value=="")
    {
        // 如果Email为空，则显示警告信息
        alert("Email不能为空！");
        form1.email.focus();
        return false;
    }
    // 检查email格式是否正确
    else if (form1.email.value.charAt(0)=="." ||
        form1.email.value.charAt(0)=="@"||
        form1.email.value.indexOf('@', 0) == -1 ||
        form1.email.value.indexOf('.', 0) == -1 ||
        form1.email.value.lastIndexOf("@")==form1.email.value.length-1 ||
        form1.email.value.lastIndexOf(".")==form1.email.value.length-1)
    {
        alert("Email的格式不正确！");
        form1.email.select();
        return false;
    }
    return true;

}    
