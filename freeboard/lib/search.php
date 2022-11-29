<!-- 검색 추가 -->
<div id="search_box">
  <form action="/pajji/board/search_result.php" method="get">
    <select name="catgo">
      <option value="title">제목</option>
      <option value="name">글쓴이</option>
      <option value="content">내용</option>
    </select>
    <input type="text" name="search" size="40" required="required" />
    <button id="b_searchBtn">검색</button>
    <input type="date" name="date_from"/>
    <input type="date" name="date_to"/>
  </form>
  <!-- 컬럼정렬 추가 -->
  <form action="/pajji/board/index.php" method="get" id="sortForm">
    <input type="hidden" name="column" id="column" value="" />
    <input type="hidden" name="sortType" id="sortType" value="desc" />
  </form>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
  function b_sort(cloumn, sortType){
    $("#column").val(cloumn);
    switch(sortType){
      case 'asc': sortType='desc'
      break;
      case 'desc': sortType='asc'
      break;
      default: sortType='desc'
      break;
    }
    $("#sortType").val(sortType);
    $("#sortForm").submit();
  }
</script>
