drop DATABASE IF  EXISTS chatapp;
create database chatapp;
use chatapp;
CREATE TABLE user (
#thống tin người dùng
    userid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		`email` nvarchar(50),#mail
		`pass` nvarchar(100),
		`name` nvarchar(20),
    `avata` nvarchar(50),
    `mota` nvarchar(300),
	`phone` nvarchar(13),
	`diachi` nvarchar(100)
   
);
create table boxchat( 
	#đoạn chat với bạn bè
	boxchatid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,#id boxchat (tự tăng)
    user1 int, FOREIGN KEY (user1) REFERENCES user(userid),#id người gửi
    user2 int, FOREIGN KEY (user2) REFERENCES user(userid)#id người nhận
  
   
);

create table groupChat(
	#thông tin group chat
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,#id  (tự tăng)
    tittle nvarchar(30)
);
create table gruopChatMember(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,#id  (tự tăng)
    groupchatid int,FOREIGN KEY (groupchatid) REFERENCES groupChat(id),
    memberid int,
    FOREIGN KEY (memberid) REFERENCES user(userid)
);
create table groupChatMessage(
	#chi tiết đoạn chat
	messageid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,#id tin nhắn (tự tăng)
    senderid int,FOREIGN KEY (senderid) REFERENCES user(userid),#người nhận
    content nvarchar(500) ,#nội dung text
    type nvarchar(10) not null,#kiểu tin nhắn , file,text...
    timeForMediaCall nvarchar(100),#trạng thái (gọi nhỡ...) ,thời gian gọi(nếu nghe máy ) cho cuộc gọi video,voice call
    groupchatid int,FOREIGN KEY (groupchatid) REFERENCES groupChat(id),#nếu nhắn vào nhóm thì lưu vào đây
    time datetime#ngày giừo gửi
);

create table message(
	#chi tiết đoạn chat
	messageid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,#id tin nhắn (tự tăng)
	sender int, FOREIGN KEY (sender) REFERENCES user(userid),#id người nhận
    content nvarchar(500) ,#nội dung text
    type nvarchar(10) not null,#kiểu tin nhắn , file,text...
    timeForMediaCall nvarchar(100),#trạng thái (gọi nhỡ...) ,thời gian gọi(nếu nghe máy ) cho cuộc gọi video,voice call
    boxchatid int,FOREIGN KEY (boxchatid) REFERENCES boxchat(boxchatid),#nêu là nhắn cho 1 người 
    time datetime#ngày giừo gửi
);
create table boxChatMessageStatus
(	
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,#id  (tự tăng)
	withUserid int,FOREIGN KEY (withUserid) REFERENCES user(userid),#id với user id
	status char(10),#trạng thái tin nhắn(đã xem , đã xoá,dã thu hồi ...)
    boxchatid int,FOREIGN KEY (boxchatid) REFERENCES boxchat(boxchatid)
);

create table Friend(
#lưu trữ thông tin lời mời kết bạn gửi cho nhau
	Friendid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,#id (tự tăng)
    fromid int, FOREIGN KEY (fromid) REFERENCES user(userid),#người gửi
    receiverid int, FOREIGN KEY (receiverid) REFERENCES user(userid),#người nhận
    status char(10),#trạng thái (đồng ý,đang là lời mời)
    time datetime#thời gian gửi
);

use chatapp;

select * from user;
select * from message;

