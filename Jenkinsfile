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

        stage('Build docker') {
            steps {
                script {
                    sh "docker build -t vourteen14/devpsecops-vuln-laravel:latest ."
                }
            }
        }

        stage('Start Container') {
            steps {
                script {
                    sh """
                    docker run -d --name devpsecops-vuln-laravel \\
                        -v \$(pwd)/database/database.sqlite:/app/database/database.sqlite \\
                        -e DB_CONNECTION=sqlite \\
                        -e DB_DATABASE=/app/database/database.sqlite \\
                        vourteen14/devpsecops-vuln-laravel:latest
                    """
                }
            }
        }

        stage('Run Migrate') {
            steps {
                script {
                    sh "docker exec devpsecops-vuln-laravel php artisan migrate  --force"
                }
            }
        }

        stage('Run Tests') {
            steps {
                script {
                    sh "docker exec devpsecops-vuln-laravel php artisan test"
                }
            }
        }

        stage('Push docker') {
            steps {
                script {
                    sh "docker push vourteen14/devpsecops-vuln-laravel:latest"
                }
            }
        }
    }
}