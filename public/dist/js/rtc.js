var connection = new RTCMultiConnection();

            // by default, socket.io server is assumed to be deployed on your own URL
            //connection.socketURL = '/';

            // comment-out below line if you do not have your own socket.io server
             connection.socketURL = 'https://rtcmulticonnection.herokuapp.com:443/';

            connection.socketMessageEvent = 'textchat-plus-fileshare-demo';

            connection.enableFileSharing = true; 

            connection.session = {
                data: true
            };

            connection.sdpConstraints.mandatory = {
                OfferToReceiveAudio: false,
                OfferToReceiveVideo: false
            };

            // https://www.rtcmulticonnection.org/docs/iceServers/
            // use your own TURN-server here!
            connection.iceServers = [{
                'urls': [
                    'stun:stun.l.google.com:19302',
                    'stun:stun1.l.google.com:19302',
                    'stun:stun2.l.google.com:19302',
                    'stun:stun.l.google.com:19302?transport=udp',
                ]
            }];

            connection.onmessage = appendDIV;
            connection.filesContainer = document.getElementById('file-container');
        
            connection.onopen = function() {
               console.log("testtttttttt")
            };

                /////////////////////
                function n(e) {   
                    var html;
                    if(e.type=="text")
                    {
                        html='<div class="message-item in">\
                        <div class="message-avatar">\
                            <figure class="avatar avatar-sm">\
                                <img src="'+e.avatar+'" class="rounded-circle" alt="image">\
                            </figure>\
                            <div>\
                                <h5>'+e.name+'</h5>\
                                <div class="time">09:23 AM <i class="mdi mdi-check-all text-info ml-1"></i></div>\
                            </div>\
                        </div>\
                        <div class="message-content">\
                            <div class="message-text">'+e.text+'\
                            </div>\
                            <div class="dropdown">\
                                <a href="#" data-toggle="dropdown">\
                                    <i class="mdi mdi-dots-horizontal"></i>\
                                </a>\
                                <div class="dropdown-menu dropdown-menu-right">\
                                    <a href="#" class="dropdown-item">Reply</a>\
                                    <a href="#" class="dropdown-item">Forward</a>\
                                    <a href="#" class="dropdown-item">Copy</a>\
                                    <a href="#" class="dropdown-item">Starred</a>\
                                    <a href="#" class="dropdown-item example-delete-message">Delete</a>\
                                </div>\
                            </div>\
                        </div>\
                        </div>'
                    }
                    else if(e.type=="file")
                    {
                        html='<div class="message-item in">\
                                <div class="message-avatar">\
                                    <figure class="avatar avatar-sm">\
                                        <img src="'+e.avatar+'" class="rounded-circle" alt="image">\
                                    </figure>\
                                    <div>\
                                        <h5>'+e.name+'</h5>\
                                        <div class="time">09:23 AM <i class="mdi mdi-check-all text-info ml-1"></i></div>\
                                    </div>\
                                </div>\
                                <div class="message-content message-file">\
                                    <div class="message-text d-flex">\
                                        <div class="file-icon">\
                                            <i class="mdi mdi-file-pdf-box-outline"></i>\
                                        </div>\
                                        <div>\
                                            <div> '+e.name+'<small class="text-muted small">('+e.size+')</small></div>\
                                            <ul class="list-inline mt-2">\
                                                <li class="list-inline-item mb-0">\
                                                    <a href="#" class="btn btn-sm btn-light-success btn-floating" title="View">\
                                                        <i class="mdi mdi-link"></i>\
                                                    </a>\
                                                </li>\
                                                <li class="list-inline-item mb-0">\
                                                    <a href="#" class="btn btn-sm btn-light-success btn-floating" title="Download">\
                                                        <i class="mdi mdi-download"></i>\
                                                    </a>\
                                                </li>\
                                            </ul>\
                                        </div>\
                                    </div>\
                                    <div class="dropdown">\
                                        <a href="#" data-toggle="dropdown">\
                                            <i class="mdi mdi-dots-horizontal"></i>\
                                        </a>\
                                        <div class="dropdown-menu">\
                                            <a href="#" class="dropdown-item">Trả lời</a>\
                                            <a href="#" class="dropdown-item">Chuyển tiếp</a>\
                                            <a href="#" class="dropdown-item">sao chéo</a>\
                                            <a href="#" class="dropdown-item">Starred</a>\
                                            <a href="#" class="dropdown-item example-delete-message">Delete</a>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>';
                    }
                    else if(e.type=="image")
                    {
                        html='<div class="message-item in">\
                        <div class="message-avatar">\
                            <figure class="avatar avatar-sm">\
                            <img src="'+e.avatar+'" class="rounded-circle" alt="image">\
                            </figure>\
                            <div>\
                                <h5>'+e.name+'</h5>\
                                <div class="time">07:45 AM <i class="mdi mdi-check-all text-info ml-1"></i></div>\
                            </div>\
                        </div>\
                        <div class="message-content">\
                            <div>\
                                <div class="message-content-images">\
                                    <a href="http://127.0.0.1:8000/dist/media/img/image1.jpg" data-fancybox="images">\
                                        <img src="http://127.0.0.1:8000/dist/media/img/image1.jpg" alt="image">\
                                    </a>\
                                    <a href="http://127.0.0.1:8000/dist/media/img/image2.jpg" data-fancybox="images">\
                                        <img src="http://127.0.0.1:8000/dist/media/img/image2.jpg" alt="image">\
                                    </a>\
                                    <a href="http://127.0.0.1:8000/dist/media/img/image3.jpg" data-fancybox="images">\
                                        <img src="http://127.0.0.1:8000/dist/media/img/image3.jpg" alt="image">\
                                    </a>\
                                </div>\
                            </div>\
                            <div class="dropdown">\
                                <a href="#" data-toggle="dropdown">\
                                    <i class="mdi mdi-dots-horizontal"></i>\
                                </a>\
                                <div class="dropdown-menu dropdown-menu-right">\
                                    <a href="#" class="dropdown-item">Reply</a>\
                                    <a href="#" class="dropdown-item">Forward</a>\
                                    <a href="#" class="dropdown-item">Copy</a>\
                                    <a href="#" class="dropdown-item">Starred</a>\
                                    <a href="#" class="dropdown-item example-delete-message">Delete</a>\
                                </div>\
                            </div>\
                        </div>\
                    </div>'
                    }
                    $(".messages").append(html)
                }
                /////////////////////


            function appendDIV(event) {
                if(event.data=="typing")
                {
                    $(".messages").append('<div class="message-item in in-typing">\n\
                    <div class="message-content">\n\
                        <div class="message-text">\n\
                                <div class="writing-animation">\n\
                                    <div class="writing-animation-line"></div>\n\
                                    <div class="writing-animation-line"></div>\n\
                                    <div class="writing-animation-line"></div>\n\
                                </div>\n\
                            </div>\n\
                        </div>\n\
                    </div>') 

                }
                else if(event.data=="endtyping")
                {
                    $(".messages .message-item.in-typing").remove()
                }
                
                $(".chat .chat-body").scrollTop($(".chat .chat-body")[0].scrollHeight)
                console.log(event);
                if(event.data!=="typing"&&event.data!=="endtyping")
                { 
                     var k= JSON.parse(event.data);
                     console.log(k.type);
                     n({
                      "avatar" :k.avatar,
                      "text" :k.data,
                      "name" :k.name,
                      "type":k.type
                     })
                }
               
            }
            $(document).ready(function(){
                connection.openOrJoin("123");
                $("#mes").focusin(function(){
                  
                    connection.send("typing")
                })
                $("#mes").focusout(function(){
                  
                    connection.send("endtyping")
                })
                $("#filetrans").change(function(){
                    var myFormData = new FormData();
                    myFormData.append('file', this.files[0]);
                    myFormData.append('filae', "aaaaa");
                    $.ajax({
                        url:"/filetrans",
                        type:"post",
                        processData: false, // important
                        contentType: false, // important
                        processData: false,
                        data: myFormData,
                        dataType: 'json',
                        success : function (e){
                            
                           console.log(e);
                         
                            // n({
                            //     type: "file",
                            //     text: a,
                            //     avatar:$("#avtimage").attr("src"),
                            //     name: $("#nameu").text()
                            // });
                           
                            //xoá nội dung chat trên text box
                            // t.val("");
                            $(".chat .chat-body").scrollTop($(".chat .chat-body")[0].scrollHeight);
                        },
                        error : function (e){      
                            console.log(e);
                            as();
                        }
                    });
                });
             })