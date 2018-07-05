function chkuserinput(form){
if(form.username.value==""){
 alert("请输入用户名!");
 form.username.select();
 return(false);
}
if(form.userpwd.value==""){
 alert("请输入用户密码!");
 form.userpwd.select();
 return(false);
}
if(form.yz.value==""){
 alert("请输入验证码!");
 form.yz.select();
 return(false);
}
return(true); 
}
