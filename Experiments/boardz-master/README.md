# boardz
게시판 검색 기능 완성하기

## 기존 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.html
```

## 추가 및 수정된 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.php (수정)
[만약 추가한 파일이 있으면, 내용 추가! 없으면 이 문구 삭제!]
```

## board.php (수정)
[내용 추가!!]

- 이중 반복문을 이용해 ul 생성과 li 생성을 분리함
- if($_POST[search])을 이용해 검색여부를 알아내고 출력물을 구분함
- 출력은 mysql_fetch_array()을 이용해서 행단위로 데이터를 받음
- mysql_fetch_array()의 인수와 반환값을 받는 변수는 검색여부에 따라 분리함
    - 아래 구문을 이용해 검색값과 매치하는 레코드를 db에서 찾아 반환함
    - $sql = "select * from boardz where title like '%$_POST[search]%' ";
- 분기문을 좀더 세밀히 설정해서 기본출력에서 모든 레코드들이 출력되도록 했다.(기존 6개-> 7개 전부 출력)
    - 두번째 ul에서만 li가 3개