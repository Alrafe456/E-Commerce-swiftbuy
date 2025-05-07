<?php
// info.php

header('Content-Type: application/json');


$project_details = array(
    "name" => "Your Full Name", // Replace with your name
    "id" => "Your University ID", // Replace with your university ID
    "personal_notion_page" => "https://link_to_your_notion_page", // Replace with your personal Notion page link
    "personal_group_page_notion" => "https://link_to_your_group_notion_page", // Replace with your group Notion page link
    "github_id" => "YourGitHubID", // Replace with your GitHub ID
    "project_github_link" => "https://github.com/your_project_link" // Replace with your project's GitHub link
);


echo json_encode($project_details);
?>
