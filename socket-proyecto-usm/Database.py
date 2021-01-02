import mysql.connector as connector

class DataBaseConnect:
    def __init__(self,info):
        self.db = connector.connect(
            host=info["host"],
            user=info["user"],
            password=info["password"],
            database=info["database"]
        )
        self.cursor = self.db.cursor(dictionary=True)

    def selectAll(self,tb_name,wheres=""):
        sql = "SELECT * FROM "+tb_name
        if len(wheres) > 0:
            sql += " WHERE "+wheres
        return self.sql_request_and_response(sql)

    def sql_request_and_response(self,sql):
        self.cursor.execute(sql)
        return self.cursor.fetchall()

f = open("../.env")
envData = f.read().split("\n")

Instance = DataBaseConnect(
    {
        "host":envData[10].split("=")[1],
        "user":envData[13].split("=")[1],
        "password":envData[14].split("=")[1],
        "database":envData[12].split("=")[1]

    }
)


        



