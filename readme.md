# i-love-u

![InLove](maquette.png?raw=true "in love")

## Goals
Create an amazing love button. When you click on it, it's just love for everyone!

## Principal
The love button is fully original, when you clic on it, it turns from blue to a wonderful and gorgeous red color.

## Architecture
Each love is can be sent only on time. The basic architecture is following :

```   
                            +--------+
                         +->| client |
                        /   +--------+
+--------+   +---------+    +--------+
| client +-->| servers +--->|   ...  |
+--------+   +---------+    +--------+
                        \   +--------+
                         +->| client |
                            +--------+
```

If you look closer, you will see that :

```
                client                                   server             database
                  |                                        |                   |
love-click        |-- http[POST] /api/loves -------------->|-- exist/persist ->| loves[id,ip,created]
                  |<-- 200 --------------------------------|<------------------|
                
people-love-count |-- http[GET] /api/loves?metaonly=true ->|----- count ------>|
                  |<-- 200 --------------------------------|<------------------|
                  
love-click-error  |-- http[POST] /api/loves -------------->|-- exist --------->|
                  |<-- 412 { message : already exist } ----|<--- yes ----------|
                  
me-love-count     |-- http[GET] /api/me/i-am-in-love ----->|-- exist(ip) ----->|
                  |<-- 200 --------------------------------|<--- yes ----------|
                  
me-love-count     |-- http[GET] /api/me/i-am-in-love ----->|-- exist(ip) ----->|
                  |<-- 404 --------------------------------|<--- no  ----------|
```

## States

The love button is full of surprises. It has 2 layers :
- the button, where people spread love
  - blue, you don't love anyone
  - red, you can love or you already love
- love count, where people know of much people love them
