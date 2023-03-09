File = open("sec1.txt","r")
std={}
for i in File:
    i = i.split()
    std[i[0]]=std[i[1]]
print(std)
