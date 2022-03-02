#include <iostream>
#include <iomanip>
#include <array>
#include <time.h>

using namespace std;

template <typename T, size_t size>
// Declaring selection sort function
void selectionSort(array<T, size>& items) {
    for (size_t i = 0; i < items.size(); i++) {
        size_t smallest = i;

        for (size_t index = i + 1; index < items.size(); index++) {
            if (items[index] < items[smallest]) {
                smallest = index;
            }
        }

        T hold = items[i];
        items[i] = items[smallest];
        items[smallest] = hold;
    }
}

int main() {
    srand(time(NULL));

    // Array of 100 numbers
    const size_t arraySize = 100;

    // Random numbers
    array<int, 100> dataRand;
    for (int i = 1; i <= arraySize; i++) {
        dataRand[i] = rand()%100;
    }

    array<int, arraySize> data = dataRand;


    // Print unsorted array
    cout << "Random generated numbers: " << endl;
    for (size_t i = 0; i < data.size(); i++) {
        cout << setw(4) << data[i];
    }

    selectionSort(data);


    // Print sorted numbers
    cout << "Sorted generated numbers:" << endl;
    for (size_t i = 0; i < data.size(); i++) {
        cout << setw(4) << data[i];
    }
    
    cout << endl;
}