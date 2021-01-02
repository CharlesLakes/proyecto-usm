import Database

class User:
    def __init__(self,id_user,token,websocket):
        self.id = id_user
        self.token = token
        self.websocket = websocket
        self.user = {}
    def login_and_validate(self):
        result = Database.Instance.selectAll("users",f"id='{self.id}' AND websocket_token='{self.token}'")
        if len(result) == 0:
            return False
        self.user = result[0]
        return True

