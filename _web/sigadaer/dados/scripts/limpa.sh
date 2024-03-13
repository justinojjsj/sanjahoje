hoje=$(date +"%Y-%m-%d")
sed -i "s/\(.*\)\t.*(/\1; /" ARQ.txt
sed -i "s/).*//" ARQ.txt
sed -i "s/$/; $hoje/" ARQ.txt 

mv ARQ.txt ../$hoje-limpo.txt
