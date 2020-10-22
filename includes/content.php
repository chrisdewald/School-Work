<section>

  <?php

    if (isset($_GET['max_min_salaries'])) {
      include 'max_min_salaries.php';
    } else if (isset($_GET['num_employees'])) {
      include 'num_employees.php';
    } else if (isset($_GET['marketing_employees'])) {
        include 'marketing_employees.php';
    } else if (isset($_GET['num_jobs'])) {
        include 'num_jobs.php';
    } else if (isset($_GET['department_name'])) {
        include 'department_name.php';
    } else if (isset($_GET['unique_first_names'])) {
        include 'unique_first_names.php';
    } else if (isset($_GET['first_three_characters'])) {
      include 'first_three_characters.php';
    } else if (isset($_GET['math_calculation'])) {
        include 'math_calculation.php';
      }
    
  ?>

</section>
