# rows = 4

# for i in range(rows):

#     for j in range(i):

#         print(" ", end="")

#     for k in range(rows-i):

#         if k % 2 == 0:

#             print("1", end="")

#         else: print("0", end="")

#     print()

# rows = 4
# for i in range(rows):
#     spaces = ' ' * i

#     pattern = ''.join(['1' if j % 2 == 0 else '0' for j in range(2 * (n - i) - 1)])
        
#     print(spaces + pattern)

rows = 5
for i in range(rows):
        # Print leading spaces
        for j in range(i):
            print(' ', end='')
        
        # Print alternating '1' and '0'
        for k in range(2 * (rows - i) - 1):
            if k % 2 == 0:
                print('1', end='')
            else:
                print('0', end='')
        
        # Move to the next line
        print()


