<?php
require('connexion.php');

function getDepartments()
{
    if($db = dbconnect())
    {
        $request = "SELECT * FROM departments";
        $list = array();
        $sql = mysqli_query($db, $request);
      while ($ligne = mysqli_fetch_assoc($sql)) {
            $list[] = array(
                "dept_no" => $ligne['dept_no'],
                "dept_name" => $ligne['dept_name']
            );
        }
        return $list;
    }
}

function getDepartments_and_manager()
    {
        if($db = dbconnect())
        {
            $request = "SELECT
                departments.dept_no,
                departments.dept_name,
                employees.emp_no,
                employees.first_name,
                employees.last_name

                FROM dept_manager
                JOIN departments ON dept_manager.dept_no = departments.dept_no
                JOIN employees ON dept_manager.emp_no = employees.emp_no
                WHERE dept_manager.to_date = '9999-01-01';



            ";
            $sql = mysqli_query($db, $request);
            return $sql;
        }
        
    }


function get_employees($id)
{
    if ($db = dbconnect()) {
        $id = mysqli_real_escape_string($db, $id);
        $request = "
            SELECT e.emp_no, e.first_name, e.last_name, e.gender
            FROM dept_emp de
            JOIN employees e ON de.emp_no = e.emp_no
            WHERE de.dept_no = '$id'
        ";
        $sql = mysqli_query($db, $request);
        return $sql;
    }
    return false;
}

function aff_employees ($id)
{
      if ($db = dbconnect()) 
    {
        $données = array();
        $requet = "SELECT * FROM employees where emp_no = '$id' ";
        $sql = mysqli_query ($db, $requet);

        return $sql;
    
    }
}

function nombre_employees ()
{
    if ($db = connect())
    {
        $request = "";
    }
}

function get_salaries ($id)
{
      if ($db = dbconnect()) 
    {
        $données = array();
        $requet = "SELECT * FROM salaries where emp_no = '$id' ";
        $sql = mysqli_query ($db, $requet);

        return $sql;
    
    }
}

function rechercher($search, $offset = 0, $limit = 20) {
    $conn = dbconnect();
    
    $sql = "SELECT employees.first_name, employees.last_name, employees.emp_no, 
                   departments.dept_name, departments.dept_no
            FROM employees
            JOIN dept_emp ON employees.emp_no = dept_emp.emp_no
            JOIN departments ON dept_emp.dept_no = departments.dept_no
            WHERE departments.dept_name LIKE ?
               OR employees.last_name LIKE ?
               OR CONCAT(employees.first_name, ' ', employees.last_name) LIKE ?
               OR departments.dept_no LIKE ?
               OR employees.emp_no LIKE ?
            LIMIT ?, ?";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Erreur de préparation : " . mysqli_error($conn));
    }

    $searchParam = "%$search%";
    $offset = (int)$offset;
    $limit = (int)$limit;

    mysqli_stmt_bind_param($stmt, "sssssii", $searchParam, $searchParam, $searchParam, $searchParam, $searchParam, $offset, $limit);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    $results = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $results[] = $row;
    }

    mysqli_stmt_close($stmt);
    mysqli_free_result($result);

    return $results;
}
?>