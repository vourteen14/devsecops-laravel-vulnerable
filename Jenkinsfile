pipeline {
    agent any

    environment {
        IMAGE_NAME = "vourteen14/devpsecops-vuln-laravel"
        CONTAINER_NAME = "devpsecops-vuln-laravel"
        SONAR_SCANNER_PATH = "/opt/sonar-scanner/bin"
        PATH = "${SONAR_SCANNER_PATH}:$PATH"
        DOCKER_PASSWORD = credentials('DOCKER_PASSWORD')
    }

    stages {
        stage('Checkout Code') {
            steps {
                script {
                    checkout scm
                }
            }
        }

        stage('Docker login') {
            steps {
                script {
                    sh "echo ${DOCKER_PASSWORD} | docker login -u vourteen14 --password-stdin"
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

        stage('Build and push') {
            steps {
                script {
                    sh "docker buildx build --tag vourteen14/devpsecops-vuln-laravel:latest --push ."
                }
            }
        }
    }
}