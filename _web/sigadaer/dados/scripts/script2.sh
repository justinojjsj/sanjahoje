# explição:
# sed -i "s/string1/string2/" ARQ.txt
# /t = TAB
# \(.*\)\t/\1 = tudo até o TAB troca pelo original

# troca TAB por ;
sed -i "s/\(.*\)\t/\1; /" ARQ.txt

#troca ( por ;
sed -i "s/ (/; /" ARQ.txt

#troca ) em diante
sed -i "s/).*//" ARQ.txt 

hoje=$(date +"%Y-%m-%d")
sed -i "s/$/; $hoje/" ARQ.txt
