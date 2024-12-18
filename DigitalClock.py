import tkinter as tk
from time import strftime

class Clock:
    def __init__(self, master):
        self.master = master
        master.title("Digital Clock")
        master.geometry("400x200")
        master.resizable(False, False)
        master.configure(bg='black')

        self.time_label = tk.Label(
            master,
            font=('Helvetica', 50),
            fg='#00ff00',
            bg='black'
        )
        self.time_label.pack(expand=True)

        self.date_label = tk.Label(
            master,
            font=('Helvetica', 18),
            fg='#00ff00',
            bg='black'
        )
        self.date_label.pack(expand=True)

        self.update_clock()

    def update_clock(self):
        current_time = strftime('%H:%M:%S %p')
        current_date = strftime('%B %d, %Y')
        self.time_label.config(text=current_time)
        self.date_label.config(text=current_date)
        self.master.after(1000, self.update_clock)

if __name__ == "__main__":
    root = tk.Tk()
    clock = Clock(root)
    root.mainloop()
