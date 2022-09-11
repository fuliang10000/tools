pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
                // 安装和更新composer包
                sh "sudo docker exec -it php74 /bin/bash -c 'composer install -o -vvv'"
                // 初始化环境
                sh "sudo docker exec -it php74 /bin/bash -c 'php /var/lib/jenkins/workspace/tools_test/init --env=Development --overwrite=a'"
            }
        }
        stage('Test') {
            steps {
                // 清缓存
                echo "sudo docker exec -it php74 /bin/bash -c 'php /var/lib/jenkins/workspace/tools_test/yii cache/flush-all'"
            }
        }
        stage('Deploy') {
            steps {
                echo 'Deploying....'
            }
        }
    }
}