# TableBoard_Shop
게시판-Shop 의 TODO 완성하기!

## 기존 파일
```
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── insert.php - 게시글 작성 기능 구현
│   └── update.php - 게시글 수정 기능 구현
│   └── delete.php - 게시글 삭제 기능 구현
├── board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── index.php - 게시글 조회 기능 구현
```

## MySQL 테이블 생성!

[여기에 테이블 생성 시, 사용한 Query 를 작성하세요.  
create table tableboard_shop(
     num int not null auto_increment,  
     date date,  
     order_id int,  
     name char(10),  
     price int,  
     quantity int,  
     primary key (num)  
);  
]

Note: 
- table 이름은 tableboard_shop 으로 생성
- 기본키는 num 으로, 그 외의 속성은 board_form.php 의 input 태그 name 에 표시된 속성 이름으로 생성
- 각 속성의 type 은 자유롭게 설정 (단, 입력되는 값의 타입과 일치해야 함)
    - ex) price -> int
    - ex) name -> char or varchar
    
## index.php 수정
[여기에 index.php 를 어떻게 수정했는지, 설명을 작성하세요.  
  while ($row = mysql_fetch_array($result))  
  를 통해 전체 레코드정보를 출력했다.
  total은 별도의 변수를 두고  
  price * quantity 값을 저장하여 그 값을 출력했다.  
]

## function
### insert.php 수정
[여기에 insert.php 를 어떻게 수정했는지, 설명을 작성하세요.
아래 구문을 통해 처리했다. (큰 따옴표는 중복문제 때문에 \"와 같이 입력함) 
자료형에 따라 따옴표 부착 여부가 달라진다. 

$sql = "insert into tableboard_shop (date, order_id, name, price, quantity)
VALUES(\"$_POST[date]\", $_POST[order_id], '$_POST[name]', $_POST[price], $_POST[quantity]);";  
]

### update.php 수정
[여기에 update.php 를 어떻게 수정했는지, 설명을 작성하세요.
아래 구문을 통해 처리했다.  
자료형에 따라 따옴표 부착 여부가 달라진다. 

$sql = "update tableboard_shop set date='$_POST[date]', order_id=$_POST[order_id], name='$_POST[name]', price=$_POST[price], quantity=$_POST[quantity]
where num = $_GET[num];";
]

### delete.php 수정
[여기에 delete.php 를 어떻게 수정했는지, 설명을 작성하세요.  
delete가 가장 간단했다.  

$sql = "delete from tableboard_shop where num = $_GET[num];";
]
