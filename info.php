<?php
// info.php

header('Content-Type: application/json');


$project_details = array(
    "name" => "Ahnaf Tahmid Al Rafe",
    "id" => "2222456",
    "personal_notion_page" => "https://www.notion.so/168a1ff4fd22484eab545c8c9b82c085",
    "personal_group_page_notion" => "https://www.notion.so/E-commerce-1ecd0e3260468074bf8cc820527e7516",
    "github_id" =>  "Alrafe456", 
    "project_github_link" => "https://github.com/Alrafe456/E-Commerce-swiftbuy"
);


echo json_encode($project_details);
?>
