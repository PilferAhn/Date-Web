

<div class="wrap-input100 validate-input m-b-16" >
<label for="day" >Day:</label>
<select name="day">
    <option >1</option>
    <option >2</option>
    <option >3</option>
    <option >4</option>
    <option >5</option>
    <option >6</option>
    <option >7</option>
    <option >8</option>
    <option >9</option>
    <option >10</option>
    <option >11</option>
    <option >12</option>
    <option >13</option>
    <option >14</option>
    <option >15</option>
    <option >16</option>
    <option >17</option>
    <option >18</option>
    <option >19</option>
    <option >20</option>
    <option >21</option>
    <option >22</option>
    <option >23</option>
    <option >24</option>
    <option >25</option>
    <option >26</option>
    <option >27</option>
    <option >28</option>
    <option >29</option>
    <option >30</option>
    <option >31</option>
</select>
<label for="day" >Month:</label>
<select name="day">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
    <option>9</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
</select>
<label for="day" >Year:</label>
<select name="year" >
<?php
    for( $x=date("Y"); $x>=(date("Y")-100); $x-- )
    {
        echo "<option>$x</option>";
    }
?>
</select>
</div>