pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
                // 安装和更新composer包
                sh "docker exec -i php74 /bin/bash -c 'cd /var/lib/jenkins/workspace/tools_test && composer install -o -vvv'"
                // 初始化环境
                sh "docker exec -i php74 /bin/bash -c 'php /var/lib/jenkins/workspace/tools_test/init --env=Development --overwrite=a'"
            }
        }
        stage('Test') {
            steps {
                // 清缓存
                echo "docker exec -i php74 /bin/bash -c 'php /var/lib/jenkins/workspace/tools_test/yii cache/flush-all'"
            }
        }
        stage('Deploy') {
            steps {
                echo 'Deploying....'
            }
        }
    }
}