(()=>{
  $("input[name=uname]").blur(e=>{
    vali($(e.target),"1_vali.php");
  })
  function vali($txt,url){
    return new Promise(resolve=>{
      var $span=$txt.next();
      if($txt.val()==""){
        $span.removeClass("right").addClass("error")
              .text("不能为空!");
      }else{
        $.get(url,$txt.attr("name")+"="+$txt.val())
          .then(data=>{//data:"true"/"false"
          if(data=="true"){
            $span.removeClass("error")
                  .addClass("right").text("可用");
            resolve();
          }else{
            $span.removeClass("right")
                  .addClass("error").text("不可用");
          }
        })
      }
    })
  }
  $("input[name=email]").blur(e=>{
    vali($(e.target),"1_vali.php");
  })
  function checkPwd(){
    var $upwd=$("input[name=upwd]"),
        $upwd2=$("#upwd2"),
        $span=$upwd2.next();
    if($upwd.val()!=$upwd2.val()){
      $span.addClass("error")
            .text("两次输入的密码不一致!");
      return false;
    }else{
      $span.removeClass("error").text("");
      return true;
    }
  }
  $("input[name=upwd]").blur(checkPwd);
  $("#upwd2").blur(checkPwd);
  var $form=$("#form1");
  $form.submit(e=>{
    e.preventDefault();
    Promise.all([
      vali($("input[name=uname]"),
            "1_vali.php"),
      vali($("input[name=email]"),
            "1_vali.php")
    ]).then(()=>{
      if(checkPwd()){
//        $.post("1_register.php",
//               $("#form1").serialize())
//          .then(data=>{
//          alert(data);
//          $form.find("p>input+span").empty();
//          $form[0].reset();
//        })
        $form.ajaxSubmit(data=>{
          alert(data);
          $form.resetForm();
          $form.find("p>input+span").empty();
        })
      }
    })
  })
})()