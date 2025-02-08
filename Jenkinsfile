pipeline {
    agent any

    environment {
        IMAGE_NAME = "devpsecops-vuln-laravel"
        CONTAINER_NAME = "devpsecops-vuln-laravel"
    }

    stages {
        stage('Checkout Code') {
            steps {
                script {
                    checkout scm
                }
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    sh "docker build -t ${IMAGE_NAME}:latest ."
                }
            }
        }
    }
}