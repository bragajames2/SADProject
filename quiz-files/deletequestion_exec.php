<?php
session_start();
$qName = $_SESSION['qName'];
$_SESSION['qName'] = $qName;

header ("location:addquiz.php?qName=".$qName."");

?>
<html>
</body>

<script type="text/javascript">
alert("Question Successfully Deleted!");
</script>
</body>
</html>

