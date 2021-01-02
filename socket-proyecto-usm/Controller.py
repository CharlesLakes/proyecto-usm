import json


async def notificaciones(websocket,user,users):
    async for message in websocket:
        try:
            message = json.loads(message)
            if message["id"] in users:
                user_to = users[message["id"]]
                await user_to.websocket.send(json.dumps({
                    "title":message["title"],
                    "description":"Te comento "+ user.user["username"]
                }))
        except:
            print("Error al enviar notificación")