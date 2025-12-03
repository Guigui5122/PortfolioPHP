<?php 


require_once 'db_connection.php';
function getAllProjects()
{
    $pdo = getDBConnection();
    
    $sql = "SELECT * FROM portfoliobdd.projects proj
                LEFT JOIN portfoliobdd.projects_skills projski ON proj.idprojects = projski.idproject
                LEFT JOIN portfoliobdd.skills ON skills.idskills = projski.idskill;;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();
                
                 $projects = [];

        foreach($result as $row){

            //Si mon projet n'est pas encore dans le tableau 
            if(isset($projects[$row['idprojects']]) == false)
            {
                $project = [
                    'idprojects' => $row['idprojects'],
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'gh_link' => $row['gh_link'],
                    'link_project' => $row['link_project'],
                    'skills' => []
                ];
                $projects[$row['idprojects']] = $project;
            }
            
            //un skill est présent dans la row ? 
            if(isset($row['idskills'])){
                //je veux ajouter le skill dans le tableau skill
                $projects[$row['idprojects']]['skills'][] = $row['name'];
            }
        }

        return $projects;
}

function getAllSkills()
{
    $pdo = getDBConnection();
    
    $sql = "SELECT * FROM portfoliobdd.skills;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();
                return $result;
}

function echoValue($row, $name)
{
    echo htmlspecialchars($row[$name], ENT_QUOTES, 'UTF-8') . "\t";
}

 function insertProject($title, $description, $gh_link, $link_project)
 {
        $pdo = getDBConnection();
        $statement = $pdo->prepare('INSERT INTO projects (title, description, gh_link, link_project)
            VALUES (:title, :description, :gh_link, :link_project)');

        $success = $statement->execute([
            'title' => $title,
            'description' => $description,
            'gh_link' => $gh_link,
            'link_project' => $link_project,
        ]);

        return $success;
    }

    
function deleteProject($idProjectToDelete)
{
        $pdo = getDBConnection();
        $statement = $pdo->prepare('DELETE FROM projects 
                    WHERE projects.idprojects = :idProjectToDelete');

        $success = $statement->execute([
            'idProjectToDelete' => $idProjectToDelete
        ]);

        return $success;
    }

?>