/*table creation*/
/*table user_detailes*/
create table user_detailes(
    id int(10) not null  primary key,
    fullname varchar(25),
    username varchar(20),
    usertype enum('voter', 'nominee', 'admin'),
    password varchar(50),
    photo varchar(100)
    );

 insert into user_detailes values(8762,'Gagan DN','gagan@admin','admin','gagan@123','gaganadmin.jpeg');
 insert into user_detailes values(9432,'Naman bhafna','namannamu18','admin','naman@123','namanadmin.jpeg');
 insert into user_detailes values(9492,'Ramchandra','ramchandra@devnur','voter','ram@123','voter1.jpeg');
 insert into user_detailes values(3492,'Riya Kulkarni','riya','voter','riya@123','voter2.jpeg');
 insert into user_detailes values(2947,'Vikram Vedha','vv@123','voter','vikram@123','voter3.jpeg');
 insert into user_detailes values(5432,'Abhay Shankar','abhay@crazy','voter','abhay@123','voter4.jpeg');
 insert into user_detailes values(1342,'Vishva Raj','vishvaraj','voter','vishvaraj@123','voter5.jpeg');

 insert into user_detailes values(3472,'Vamshi M','vamshiraj','nominee','vamshi@123','nominee1.jpeg');
 insert into user_detailes values(2977,'Gagan C','gagan_c','nominee','gaganc@123','nominee2.jpeg');
 insert into user_detailes values(3264,'Chethan Rajive','chethan@mech','nominee','chethan@123','nominee3.jpeg');
 insert into user_detailes values(5491,'Suraj Chandhra','suraj@sun','nominee','suraj@123','nominee4.jpeg');
 insert into user_detailes values(1386,'Pavithra R','pavithra@pavi','nominee','pavithra@123','nominee5.jpeg');
 
/*create table user_detailes(id int(10) not null primary key,fullname varchar(25),username varchar(20),usertype enum('voter', 'nominee', 'admine'),password varchar(50),photo varchar(100));*/
/*table user_extra_detailes*/
 create table user_extra_detailes(
    id int(10) primary key,
    email varchar(200),
    phone varchar(100),
    dob date,state varchar(300),
    gender enum('male', 'female', 'prefer not to say'),
    tc int(1),
    foreign key(id) references user_detailes(id) on delete cascade
    );



 insert into user_extra_detailes values(1342,'vishvaraj@gmail.com',9988765434,'2000-11-11','karnataka','male',1);
 insert into user_extra_detailes values(1386,'pavithra_r@gmail.com',9123456543,'2001-10-02','karnataka','female',1);
 insert into user_extra_detailes values(2947,'vikram_vedha@gmail.com',9876554321,'2002-09-30','karnataka','male',1);
 insert into user_extra_detailes values(2977,'gagan_c@gmail.com',8765432987,'2005-06-23','karnataka','male',1);
 insert into user_extra_detailes values(3264,'chethan_rajive@gmail.com',8976564545,'1997-12-02','karnataka','male',1);
 insert into user_extra_detailes values(3472,'vamshi@gmail.com',8843565434,'2002-04-14','karnataka','male',1);
 insert into user_extra_detailes values(3492,'riya.kulkarni@gmail.com',9934534544,'2004-08-11','karnataka','female',1);

 insert into user_extra_detailes values(5432,'abhay_shankar@gmail.com',6543218764,'2003-03-17','karnataka','male',1);
 insert into user_extra_detailes values(5491,'suraj_chandhra@gmail.com',6543567876,'2003-05-12','karnataka','male',1);
 insert into user_extra_detailes values(8762,'gagan@gmail.com',9898767654,'2003-07-11','karnataka','male',1);
 insert into user_extra_detailes values(9432,'namannamu18@gmail.com',8876998768,'2000-10-06','karnataka','male',1);
 insert into user_extra_detailes values(9492,'ramchandra@gmail.com',6432543789,'2006-11-06','karnataka','male',1);
    /* create table user_extra_detailes(id int(10) primary key,email varchar(200),phone varchar(100),dob date,state varchar(300),gender enum('male', 'female', 'prefer not to say'),tc int(1),foreign key(id) references user_detailes(id) on delete cascade);*/
/*table password_up*/
 create table sequrity(
    id int(10) primary key,
    sequrity_question int(10),
    sequrity_answer varchar(200),
    foreign key(id) references user_detailes(id) on delete cascade
    );

    insert into sequrity values(1342,2,'puppy');
    insert into sequrity values(1386,1,'pinky');
    insert into sequrity values(2947,4,'rangamma');
    insert into sequrity values(2977,5,'shivprasadh');
    insert into sequrity values(3264,6,'virat boarding school');
    insert into sequrity values(3472,7,'swetha');
    insert into sequrity values(3492,3,'krithi');
    insert into sequrity values(5432,4,'manglamma');
    insert into sequrity values(5491,3,'pruthvi');
    insert into sequrity values(8762,8,'admin');
    insert into sequrity values(9432,8,'admin');
    insert into sequrity values(9492,2,'babloo');
 /*create table sequrity(id int(10) primary key,sequrity_question int(10),sequrity_answer varchar(200),foreign key(id) references user_detailes(id)on delete cascade);*/
/*table vote_status*/
 create table vote_status(
    id int(10) primary key,
    status int(10),
    foreign key(id) references user_detailes(id) on delete cascade
    );

     insert into vote_status values(1342,0);
     insert into vote_status values(1386,0);
     insert into vote_status values(2947,0);
     insert into vote_status values(2977,0);
     insert into vote_status values(3264,0);
     insert into vote_status values(3472,0);
     insert into vote_status values(3492,0);
     insert into vote_status values(5432,0);
     insert into vote_status values(5491,0);
     insert into vote_status values(8762,0);
     insert into vote_status values(9432,0);
     insert into vote_status values(9492,0);
/* create table vote_status(id int(10) primary key,status int(10),foreign key(id) references user_detailes(id) on delete cascade);*/
/*table votes*/
create table votes(
    id int(10) primary key,
    symbol varchar(500),
    vote int(11),
    nota int(11),
    foreign key(id) references user_detailes(id)on delete cascade
    );


     insert into votes values(1342,'man1.png',0,0);
     insert into votes values(1386,'party2.jpeg',0,0);
     insert into votes values(2947,'party3.png',0,0);
     insert into votes values(2977,'voter1.png',0,0);
     insert into votes values(3264,'voter2.jpeg',0,0);
     insert into votes values(3472,'voter3.png',0,0);
     insert into votes values(3492,'voter4.png',0,0);
     insert into votes values(5432,'voter6.png',0,0);
     insert into votes values(5491,'party3.png',0,0);
     insert into votes values(8762,'gagan.jpeg',0,0);
     insert into votes values(9432,'naman.jpeg',0,0);
     insert into votes values(9492,'voter3.png',0,0);
/* create table votes(id int(10) primary key,symbol varchar(500),vote int(11),foreign key(id) references user_detailes(id)on delete cascade);*/
/*table varify_and_approve*/
 create table varify_and_approve(
    id int(10) primary key,
    varified int(11),
    approve int(11),
    foreign key(id) references user_detailes(id)on delete cascade
    );


     insert into varify_and_approve values(1342,0,0);
     insert into varify_and_approve values(1386,0,0);
     insert into varify_and_approve values(2947,0,0);
     insert into varify_and_approve values(2977,0,0);
     insert into varify_and_approve values(3264,0,0);
     insert into varify_and_approve values(3472,0,0);
     insert into varify_and_approve values(3492,0,0);
     insert into varify_and_approve values(5432,0,0);
     insert into varify_and_approve values(5491,0,0);
     insert into varify_and_approve values(8762,0,0);
     insert into varify_and_approve values(9432,0,0);
     insert into varify_and_approve values(9492,0,0);
/* create table varify_and_approve(id int(10) primary key,varified int(11),approve int(11),foreign key(id) references user_detailes(id)on delete cascade);*/



/*query*/
/*
1) select ud.id,ud.fullname,ud.username,ud.usertype,ud.password,
ud.photo,ued.email,ued.phone,ued.dob,ued.state,ued.gender,ued.tc,
s.sequrity_question,s.sequrity_answer,vs.status,v.symbol,v.vote,
v.nota,va.varified,va.approve from user_detailes ud,user_extra_detailes ued,
sequrity s,vote_status vs,votes v,varify_and_approve va where ud.id=ued.id 
and ud.id=s.id and ud.id=vs.id and ud.id=v.id and ud.id=va.id;

2)select ud.id,ud.fullname,ud.username,ud.usertype,ud.password,
 ud.photo,ued.email,ued.phone,ued.dob,ued.state,ued.gender,ued.tc,
 s.sequrity_question,s.sequrity_answer,vs.status,v.symbol,v.vote,
 v.nota,va.varified,va.approve from user_detailes ud,user_extra_detailes ued,
 sequrity s,vote_status vs,votes v,varify_and_approve va where ud.id=ued.id 
and ud.id=s.id and ud.id=vs.id and ud.id=v.id and ud.id=va.id and ud.usertype='nominee';


3)select id from user_detailes;







*/