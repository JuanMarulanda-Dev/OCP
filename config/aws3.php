<?php

return [
    "aws_url_bucket" => env('AWS_URL_BUCKET', "https://lvproyects.s3.us-east-2.amazonaws.com/"),
    "aws_folder_img" => env('AWS_FOLDER_IMG', "ocp_user_avatars"),
    "aws_prefix_project_folder" => env("AWS_PREFIX_PROJECT_FOLDER", "ocp_project_"),
];
