# /bin/python
# A script that will take a given chart of data, and create an excel sheet
# from it. Or atleast, in hopes.
# According to my data, we need a max 133 lgs for the
# beach, a min of like 44 on skeleton numbers,
# 60 on good numbers.

import time
import sys
#import openpyxl as op
import numpy as np
import pandas as pd


# Constants Below
NUM_LTS = 18
NUM_SRS = 24
NUM_LGS = 106 
LGDF_PATH = ("/srv/http/tohorweb/tmp/lgdata.csv")
MIN_GRID_ARRAY = (11,22)
BDF_PATH = ('/srv/http/tohorweb/tmp/beaches.csv')
SDF_PATH = ('/srv/http/tohorweb/tmp/schedule.csv')

def main():
    beaches=[];lgdata=[];schedule=[]
    step_one(BDF_PATH,beaches,1)
    step_one(LGDF_PATH,lgdata,1)
    step_one(SDF_PATH,schedule,0)

    print(beaches);print(' ')
    print(lgdata);print(' ')
    print(schedule)
    # For each row
    for index in range(len(schedule)):
        step_two(index,lgdata,beaches,schedule)
    print(schedule)
    step_three(schedule)


# This function will read the variables listed 
# under the instance-config.php file
#def get_consts(filepath,constants):
#    with open(filepath, 'r') as file:
#        for line in file:
#            if line

# This function takes the data from the given path,
# Reads it, strips it of the commas, then makes a new
# List out of it that the code can process
def step_one(db_path,given_list,take_out_header):
    with open(db_path, 'r') as db:
        read = db.read()
        if take_out_header:
            read = read[read.find('\n') + 1:]
        rows = read.strip().split('\n')
        for row in rows:
            given_list.append(row.split(','))
    return given_list 

 
# This function will assume that all the necessary roles have been filled.
# I think it'll be called from the main function, something like that.
def step_two(row, lgdata, beaches, schedule):
    for index_a, entry in enumerate(schedule[row]):
        if entry.startswith('lt'):
            beach_int = int(beaches[index_a][3])
            for index_b in range(len(lgdata)):
                if (lgdata[index_b][3] == '2' 
                # and lgdata[index_b][8] !< time.strftime('%m%d')[0:4] 
                and lgdata[index_b][10][beach_int] != 1):
                    schedule[row][index_a] = (
                        f"{lgdata[index_b][0][0]}.{lgdata[index_b][1]}("
                        f"{lgdata[index_b][4]}&{lgdata[index_b][5]})"
                    )
                    lgdata.pop(index_b);break
        elif entry.startswith('sr'):
            beach_int = int(beaches[index_a][3])
            for index_b in range(len(lgdata)):
                if (lgdata[index_b][3] == '1'
                # and lgdata[index_b][8] !< time.strftime('%m%d')[0:4]
                and lgdata[index_b][10][beach_int] != 1):
                    schedule[row][index_a] = (
                        f"{lgdata[index_b][0][0]}.{lgdata[index_b][1]}("
                        f"{lgdata[index_b][4]}&{lgdata[index_b][5]})"
                    )
                    lgdata.pop(index_b);break
        elif entry.startswith('lg'):
            beach_int = int(beaches[index_a][3])
            for index_b in range(len(lgdata)):
                if (beaches[index_a][5][0] == '0'
                and lgdata[index_b][2] <= '3'):
                    break
                else:
                    if (lgdata[index_b][3] == '0'
                    and lgdata[index_b][10][beach_int] != 1):
                        schedule[row][index_a] = (
                        f"{lgdata[index_b][0][0]}.{lgdata[index_b][1]}("
                        f"{lgdata[index_b][4]}&{lgdata[index_b][5]})"
                        )
                        lgdata.pop(index_b);break

# This code will take the list and create a table from it in html
def step_three(schedule):
    print(schedule)
    with open('test.txt', 'w') as file:
        file.writelines(schedule);file.close()
    """    
    revised_list = sum(schedule,[])
    for index in range(23):
        revised_list.insert(index*12,"\n")
    for index in range(len(revised_list)):

    with open('table.html','w' as file:
              file.write
    var = pd.read_csv('edited_schedule.csv')
    var.to_html('Table.html')
    html_file = var.to_html()
    revised_str = str(revised_list)
    with open('edited_schedule.csv','w') as file:
        file.write(revised_str[1:len(revised_str)-1])
"""
# This code is contributed by Chitranayal
def printRLE(st):
        n = len(st);i = 0
        while i < n - 1:
            count = 1
            while (i < n -1 and st[i] == st[i + 1]):
                count += 1
                i += 1
            i += 1
            print(st[i-1]+str(count),end = "");print("")


# Delivers code, equivalent of int main() in C
if __name__ == "__main__":
    main()
