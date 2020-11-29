<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin: auto;
  width: 50%;

}
</style>
<body>

<h3 style="text-align: center;">BSMRSTU Programmer of the year calculator 2019 </h3>

<div>
  <form action="cal.php" method="get">
    <!-- <label for="fname">CF Handel</label> -->
    <input type="text" id="fname" name="fname" placeholder="CF handel">
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>