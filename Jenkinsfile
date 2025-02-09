pipeline {
    agent any

    environment {
        IMAGE_NAME = "devpsecops-vuln-laravel"
        CONTAINER_NAME = "devpsecops-vuln-laravel"
        SONAR_SCANNER_PATH = "/opt/sonar-scanner/bin"
        PATH = "${SONAR_SCANNER_PATH}:$PATH"
    }

    stages {
        stage('Checkout Code') {
            steps {
                script {
                    checkout scm
                }
            }
        }

        stage('SCA') {
            steps {
                script {
                    sh "sonar-scanner   -Dsonar.projectKey=devsecops-pipeline-testing   -Dsonar.sources=.   -Dsonar.host.url=https://snr.angga-sr.xyz   -Dsonar.token=sqp_4b392481d48b565ce2160c27700aff92e3016ce8 "
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