<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>
dfsjkhbdhjjd
<div id="box"></div>
<button onclick="cc()">点击</button>
<script src="{{asset('js/jquery.js')}}"></script>
<script>

    function cc(){
      console.log(11111);
      $.ajax({
          url:'/api/v1/bb',
          type:"post",   //请求方式
          data:{
              id: 'c0a816ea0b5400000009',
              message: '这是我想说的话，只说给你听!!'
          },
          success:function (e) {
              console.log(e);
              console.log(99)
          }
      });
    };
    window.onload = function() {
        ws = new WebSocket("ws://127.0.0.1:8088");
        ws.onmessage = function (e) {
            // json数据转换成js对象
            var data = eval("(" + e.data + ")");
            console.log(data.type);
            switch (data.type) {
                // Events.php中返回的init类型的消息，将client_id发给后台进行uid绑定
                case 'init':
                    // 利用jquery发起ajax请求，将client_id发给后端进行uid绑定
                    console.log(data.client_id);
                    $.ajax({
                        url:'/api/v1/aa',
                        type:"post",   //请求方式
                        data:{
                            id: data.client_id
                        },
                        success:function (e) {
                            console.log(e);
                        }
                    });
                    break;
                case 'login':
                    console.log(data.type)
                    console.log(data.message)
                    $('#box').append(data.message);
                    break;
                case 'msg':
                    // alert(data.message)
                    console.log(data.type)
                    $('#box').append(data.message);
                    break;
                // 当mvc框架调用GatewayClient发消息时直接alert出来
                default :
                    console.log(data);
            }
        };
    }
</script>
</body>
</html>